<?php
//node structure
class Node {
  public $data;
  public $next;
}

class LinkedList {
  public $head;
  public $array= [];

  //constructor to create an empty LinkedList
  public function __construct(){
    $this->head = null;
  }

  //display the content of the list
  public function PrintList() {
    $temp = new Node();
    $temp = $this->head;
    if($temp != null) {
      $count = 0;
      while($temp != null) {
        $this->array[$count] = $temp->data;
        $temp = $temp->next;
        $count++;
      }
      return $this->array;
    } else {
      echo "The list is empty.";
    }
  }
};

// test the code
//create an empty LinkedList
$MyList = new LinkedList();

//Add first node.
$first = new Node();
$first->data = 0;
$first->next = null;
//linking with head node
$MyList->head = $first;

//Add second node.
$second = new Node();
$second->data = 1;
$second->next = null;
//linking with first node
$first->next = $second;

//Add third node.
$third = new Node();
$third->data = 2;
$third->next = null;
//linking with second node
$second->next = $third;

//Add fourth node.
$futh = new Node();
$futh->data = 3;
$futh->next = null;
//linking with third node
$third->next = $futh;

//Add fith node.
$fifth = new Node();
$fifth->data = 4;
$fifth->next = null;
//linking with fourth node
$futh->next = $fifth;



//print the content of list
foreach($MyList->PrintList() as $item){
  echo $item;
}


function numComponents($list=[], $sub=[]):int {
    $count = 0;
    $count_check = 0;
    for($i = 0; $i< count($sub); $i++){
      $first = $sub[$i];
      for($j = 0; $j< count($list); $j++){
        if($first == $list[$j]){
          if($j+2 == count($list)){
            $count++;
          }
          if ($j+2 <= count($list)) {
            $second = $list[$j+1];
            for ($k = 0; $k< count($sub); $k++) {
              if ($second == $sub[$k]) {
                  $count++;
                  $count_check++;
              }
            }
          }
        }
      }
    }
    if($count_check % 2 == 0){
      $count = $count-1;
    }
    return $count;
}

echo  '</br>'.numComponents($MyList->PrintList(), $G=[0,3,1,4])

?>