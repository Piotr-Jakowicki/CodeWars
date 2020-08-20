#include <string>
#include <vector>
using namespace std;
std::string tickets(const std::vector<int>& peopleInLine) {
  int pocket25 = 0;
  int pocket50 = 0;
  for(int i=0;i<peopleInLine.size();i++){
    if(peopleInLine[i] == 25) pocket25++;
    else if(peopleInLine[i] == 50){
        if(pocket25 == 0) return "NO";   
        pocket25--;
        pocket50++;
    }
    else if (peopleInLine[i] == 100){
    
        if((pocket25 == 0 || pocket50 == 0) && (pocket25 < 3)) return "NO";
        if(pocket50 == 0 && pocket25 >= 3){
          pocket25 = pocket25 - 3;
        } else {
          pocket25--;
          pocket50--;

        }
          
    }
  }
  return "YES";
}