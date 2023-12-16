# transfer the json file into csv
# it can exclude the column you don't want 
# through add the column header name into "./exclude/{basename}.txt"
import json
import csv
import os


# def load_json_and_store_csv(json_file_path, csv_file_path):
#     # Load JSON data from file
#     with open(json_file_path, 'r') as json_file:
#         data = json.load(json_file)

#     # Prepare CSV file for writing
#     with open(csv_file_path, 'w', newline='') as csv_file:
#         # Extract the header from the first record in JSON data
#         header = list(data[0].keys()) if data else []

#         # Create a CSV writer with the header
#         csv_writer = csv.DictWriter(csv_file, fieldnames=header)
#         csv_writer.writeheader()

#         # Write each record to CSV, handling missing elements with 'None'
#         for record in data:
#             csv_writer.writerow({key: record.get(key, None) for key in header})

def flatten_json(data, parent_key='', sep='_'):
    """Flatten nested JSON structure."""
    flattened = {}
    for key, value in data.items():
        new_key = f"{parent_key}{sep}{key}" if parent_key else key
        if isinstance(value, dict):
            flattened.update(flatten_json(value, new_key, sep=sep))
        elif isinstance(value, list):
            # flattened.update(flatten_json(value, new_key, sep=sep))
            for zero, one in enumerate(value):
                if isinstance(one, dict):
                    # rtn = flatten_json(one)
                    # print(rtn)
                    flattened.update(flatten_json(one, new_key, sep=sep))
                    # mlist.append(flatten_json(one))
                    pass
                    # flattened.update(flatten_json(one, new_key, sep=sep))

                # flattened[subkey] = subvalue
        else:
            flattened[new_key] = value
        pass
    return flattened
# def flatten_json(data, parent_key='', sep='_'):
#     """Flatten nested JSON structure."""
#     flattened = {}
#     if isinstance(data, list):
#         for index, item in enumerate(data):
#             flattened_item = flatten_json(item, parent_key=f"{parent_key}{sep}{index}", sep=sep)
#             flattened.extend(flattened_item)

#     elif isinstance(data, dict):
#         for key, value in data.items():
#             new_key = f"{parent_key}{sep}{key}" if parent_key else key
#             if isinstance(value, dict):
#                 flattened.update(flatten_json(value, new_key, sep=sep))
#             elif isinstance(value, list):
#                 for index, sub_item in enumerate(value):
#                     flattened_sub_item = flatten_json(sub_item, parent_key=new_key, sep=sep)
#                     flattened.extend(flattened_sub_item)
#             else:
#                 flattened[new_key] = value

#     return flattened


# def flatten_json_(data, parent_key='', sep='_'):
#     flattened_data = []
    
#     if isinstance(data, list):
#         for index, item in enumerate(data):
#             flattened_item = flatten_json(item, parent_key=f"{parent_key}{sep}{index}", sep=sep)
#             flattened_data.extend(flattened_item)
#     elif isinstance(data, dict):
#         for key, value in data.items():
#             new_key = f"{parent_key}{sep}{key}" if parent_key else key
#             if isinstance(value, list):
#                 for index, sub_item in enumerate(value):
#                     flattened_sub_item = flatten_json(sub_item, parent_key=new_key, sep=sep)
#                     flattened_data.extend(flattened_sub_item)
#             elif isinstance(value, dict):
#                 flattened_sub_item = flatten_json(value, parent_key=new_key, sep=sep)
#                 flattened_data.extend(flattened_sub_item)
#             else:
#                 flattened_data.append({new_key: value})
    
#     return flattened_data


def load_exclude_file(exclude_file_path):
    """Load exclusion data from a file."""
    with open(exclude_file_path, 'r') as exclude_file:
        exclude_data = [line.strip() for line in exclude_file.readlines()]
    return exclude_data


def apply_exclusions(record, exclude_data):
    """Apply exclusions to a record."""
    for exclusion in exclude_data:
        # key, value = exclusion.split()
        if exclusion in record:
        # if exclusion in record and record[exclusion] == value:
        # if key in record and record[key] == value:
            # del record[key]
            del record[exclusion]
    return record

# def load_json_and_store_csv(json_file_path, csv_file_path):
#     # Load JSON data from file
#     with open(json_file_path, 'r') as json_file:
#         data = json.load(json_file)

#     # Flatten nested structures in each record
#     flattened_data = [flatten_json(record) for record in data]

#     # Prepare CSV file for writing
#     with open(csv_file_path, 'w', newline='') as csv_file:
#         # Extract the header from the flattened data
#         header = list(flattened_data[0].keys()) if flattened_data else []

#         # Create a CSV writer with the header
#         csv_writer = csv.DictWriter(csv_file, fieldnames=header)
#         csv_writer.writeheader()

#         # Write each flattened record to CSV, handling missing elements with 'None'
#         for record in flattened_data:
#             csv_writer.writerow({key: record.get(key, None) for key in header})

# def load_json_and_store_csv(json_file_path, csv_file_path, exclude_file_path=None):
#     # Load JSON data from file
#     with open(json_file_path, 'r') as json_file:
#         data = json.load(json_file)

#     # Flatten nested structures in each record
#     flattened_data = [flatten_json(record) for record in data]

#     # Load exclusions from the exclude file
#     exclude_data = load_exclude_file(exclude_file_path) if exclude_file_path else {}

#     # Prepare CSV file for writing
#     with open(csv_file_path, 'w', newline='') as csv_file:
#         # Extract the header from the flattened data
#         header = list(flattened_data[0].keys()) if flattened_data else []

#         # Create a CSV writer with the header
#         csv_writer = csv.DictWriter(csv_file, fieldnames=header)
#         csv_writer.writeheader()

#         # Write each flattened and filtered record to CSV, handling missing elements with 'None'
#         for record in flattened_data:
#             filtered_record = apply_exclusions(record, exclude_data)
#             csv_writer.writerow({key: filtered_record.get(key, None) for key in header})

def remove_excluded_columns(header, exclude_data):
    """Remove excluded columns from the header."""
    return [column for column in header if column not in exclude_data]




def load_json_and_store_csv(json_file_path, csv_file_path, exclude_file_path=None):
    # Load JSON data from file
    with open(json_file_path, 'r') as json_file:
        data = json.load(json_file)

    # Flatten nested structures in each record
    flattened_data = [flatten_json(record) for record in data]

    # Load exclusions from the exclude file
    exclude_data = load_exclude_file(exclude_file_path) if exclude_file_path else []

    # Prepare CSV file for writing
    with open(csv_file_path, 'w', newline='') as csv_file:
        # Extract the header from the flattened data
        header = list(flattened_data[0].keys()) if flattened_data else []

        # Remove excluded columns from the header
        updated_header = remove_excluded_columns(header, exclude_data)

        # Create a CSV writer with the updated header
        csv_writer = csv.DictWriter(csv_file, fieldnames=updated_header)
        csv_writer.writeheader()

        # Write each flattened and filtered record to CSV, handling missing elements with 'None'
        for record in flattened_data:
            filtered_record = apply_exclusions(record, exclude_data)
            csv_writer.writerow({key: filtered_record.get(key, None) for key in updated_header})

# # Example usage:
# json_file_path = 'CarPark.json'
# csv_file_path = 'output2.csv'
# exclude_file_path = 'exclude.txt'

# load_json_and_store_csv(json_file_path, csv_file_path, exclude_file_path)

def process_folder(main_folder, input_name, output_file, exclude_file_path=None):
    # Initialize data accumulator
    all_flattened_data = []
    updated_header = []
    # Iterate over subfolders in the main folder
    for subfolder in os.listdir(main_folder):
        subfolder_path = os.path.join(main_folder, subfolder)

        # Check if the item in the main folder is a directory
        if os.path.isdir(subfolder_path):
            # Construct the path to the base.json file in the subfolder
            base_json_path = os.path.join(subfolder_path, input_name)

            # Check if the base.json file exists in the subfolder
            if os.path.exists(base_json_path):
                # Load JSON data from base.json file
                with open(base_json_path, 'r') as json_file:
                    data = json.load(json_file)

                # Flatten nested structures in each record
                if data == None or len(data) == 0: 
                    print(subfolder + "  \t/" + input_name + "\t is empty type (none)")
                    continue
                flattened_data = [flatten_json(record) for record in data] # if data else {}
                # flattened_data = [flatten_data(record) for record in data] # if data else {}
                # Load exclusions from the exclude file
                # exclude_name = os.path.join(exclude_file_path, )
                exclude_data = load_exclude_file(exclude_file_path) if exclude_file_path else []

                # Remove excluded columns from the header
                header = list(flattened_data[0].keys()) if flattened_data else []
                updated_header = remove_excluded_columns(header, exclude_data)

                # Accumulate flattened and filtered records
                all_flattened_data.extend([
                    apply_exclusions(record, exclude_data) for record in flattened_data
                ])
            tmp = 0
    pass

    # Prepare CSV file for writing
    with open(output_file, 'w', newline='') as csv_file:
        # Create a CSV writer with the updated header
        csv_writer = csv.DictWriter(csv_file, fieldnames=updated_header)
        csv_writer.writeheader()

        # Write each accumulated record to CSV, handling missing elements with 'None'
        for record in all_flattened_data:
            csv_writer.writerow({key: record.get(key, None) for key in updated_header})


input_folder = 'db_ssh'
exclude_folder = 'exclude'
output_file = 'output_carpark.csv'
output_folder = 'data_csv1'

# json_file_path = 'ParkingTicketing.json'
# csv_file_path = 'ParkingTicketing.csv'


if not os.path.exists(output_folder):
    os.mkdir(output_folder)
for main_name in os.listdir(os.path.join(input_folder, "Taoyuan")):
    # input_name = 'CarPark.json'
    name , extension = os.path.splitext(main_name)
    new_filename = name + "_output.csv"
    exclude_name = name + ".txt"
    exclude_path = os.path.join(exclude_folder, exclude_name)
    output_path = os.path.join(output_folder, new_filename)
    if main_name.endswith('.json'):
        process_folder(input_folder, main_name, output_path, exclude_path)


# load_json_and_store_csv(json_file_path, csv_file_path, exclude_file_path)