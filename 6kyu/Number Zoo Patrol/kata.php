function find_number(array $a): int {
  if(empty($a)) return 1;
  $tab = array_diff(range(1, max($a)+1),$a);
  return array_shift($tab);
}