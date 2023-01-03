import'dart:io';

void main(){
  try{
    print("Enter an integer number: ");
  int num = int.parse(stdin.readLineSync()!);
  print("Entered number is $num");
  }catch(ex){
    print("Enter valid number please");
  }
}
