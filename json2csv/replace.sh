#!/bin/bash

# Set the source and destination folder paths
source_folder="./data_csv"
# parent_folder=$(dirname "$source_folder")
parent_folder=".."
destination_folder="$parent_folder/$(basename "$source_folder")"

# Display a warning message
echo "Warning: This action will remove the existing folder in the parent directory and copy '$source_folder' to its parent folder."

# Ask for confirmation
read -p "Do you want to proceed? (y/n): " confirm

# Check user's response
if [ "$confirm" == "y" ]; then
    # Remove the existing folder in the parent directory
    rm -r "$destination_folder"
    # echo $source_folder
    # echo $parent_folder
    # echo $destination_folder
    
    # Copy the folder to the parent folder
    cp -r "$source_folder" "$parent_folder"
    
    echo "Folder removed and copied successfully."
else
    echo "Operation canceled."
fi
