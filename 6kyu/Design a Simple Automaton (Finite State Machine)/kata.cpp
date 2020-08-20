#include <vector>
using namespace std;
class Automaton
{
public:
  bool read_commands(const std::vector<char>& commands){
    int temp = 0;
    for(int i=0;i<commands.size();i++){
      if(temp == 0 && commands[i] == '1') temp++;
      else if(temp == 1 && commands[i] == '0') temp++;
      else if(temp == 2) temp--;
    }
    return (temp == 2) ? false : true;
  }
  
};