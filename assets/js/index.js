jQuery(document).ready(function () {
  $ = jQuery;
  // alert("Hello");
});

// Introduction : The filter() method creates a new array filled with elements that pass a test provided by a function

// Array
var words = ["spray", "limit", "elite", "exuberant", "destruction", "present"];

// Filtering Data And Getting Those Words Whose Length is Greater Than Six
const result = words.filter((word) => word.length > 6);

console.log(result);

// Expected Output:[ 'exuberant', 'destruction', 'present' ]
