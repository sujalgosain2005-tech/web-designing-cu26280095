const marks=Number(prompt("Marks"));let grade;if(marks>=90)grade="A";else if(marks>=75)grade="B";else if(marks>=60)grade="C";else grade="D";
switch(grade){case "A":case "B":case "C":case "D":alert("Grade: "+grade);break;default:alert("Invalid marks");}
