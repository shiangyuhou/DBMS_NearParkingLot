# split the first line of the csv 
# aka the header of the table 
# and put into each "./include/{basename}.txt"

# just used to check the header in the table 
import os
def split_line_and_write_to_file(line, output_file):
    """Split a line with commas and write each value to a file."""
    values = line.split(',')
    with open(output_file, 'w') as file:
        for value in values:
            file.write(value.strip() + '\n')

# Example usage:
input_folder = "data_csv"
input_file = ""
outpit_folder = "include"
output_file = "output.txt"

os.mkdir(outpit_folder)
for basename in os.listdir(input_folder):
    with open(os.path.join(input_folder, basename)) as csv_file:
        first_line = csv_file.readline().strip()
    base, null = basename.split('_')
    base = base + ".txt"
    output_file = os.path.join(outpit_folder, base)
    split_line_and_write_to_file(first_line, output_file)