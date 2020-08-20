#include <cmath>
#include <string>
using namespace std;
std::string calculateString(std::string calcIt) 
{
        string numbers;
    int separator = 0;
    for(int i=0;i<calcIt.length();i++){
      if(isdigit(calcIt[i]) || calcIt[i] == '*' || calcIt[i] == '/' || calcIt[i] == '+' || calcIt[i] == '-' || calcIt[i] == '.') numbers += calcIt[i];
    }
    
    for(int i=0;i<numbers.length();i++){
        if(numbers[i] == '*' || numbers[i] == '/' || numbers[i] == '+' || numbers[i] == '-'){
            separator = i;
            break;
        }
    }
    double a = stod(numbers.substr(0,separator));
    double b = stod(numbers.substr(separator+1,numbers.length()-separator-1));
    if(numbers[separator] == '/') return to_string((int)round(a/b));
    else if(numbers[separator] == '*') return to_string((int)round(a*b));
    else if(numbers[separator] == '-') return to_string((int)round(a-b));
    else if(numbers[separator] == '+') return to_string((int)round(a+b));