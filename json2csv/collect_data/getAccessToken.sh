text_file="token.txt"
key_file="key.txt"

# read ID
ID=$(sed -n '1p' "$key_file")
# read Secure
Secure=$(sed -n '2p' "$key_file")

# read -p "input the place to store ( ./<input> ) :" root
# if [ -z "$root" ]; then
#      root="DB"
# fi
#     echo "You choose: ./$root"

# echo $ID
# echo $Secure
curl --request POST \
     --url 'https://tdx.transportdata.tw/auth/realms/TDXConnect/protocol/openid-connect/token' \
     --header 'content-type: application/x-www-form-urlencoded' \
     --data grant_type=client_credentials \
     --data client_id=$ID \
     --data client_secret=$Secure \
    | jq '.access_token' > $text_file
TOKEN=$(<"$text_file" tr -d '"')

./requireAPI.sh $root $TOKEN


# echo $token
