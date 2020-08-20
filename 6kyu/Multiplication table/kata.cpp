#include <vector>

using namespace std;
vector<vector<int>> multiplication_table(int n){
  vector<vector<int> > vect(n, vector <int> (n));
    
    for(int i=0;i<vect.size();i++){
        vect[i];
        for(int j=0;j<vect[i].size();j++){
            vect[i][j] = (i+1)*(j+1);
        }

    }
  
  return vect;
}