cd app\Protos

echo "COMPILING..."

protoc --proto_path=. --php_out=../Protobuff ./requestPb.proto
protoc --proto_path=. --php_out=../Protobuff ./entityPb.proto
protoc --proto_path=. --php_out=../Protobuff ./timePb.proto

cd ..
cd ..