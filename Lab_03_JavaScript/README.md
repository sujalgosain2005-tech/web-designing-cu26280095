# Lab Sheet 3 — JavaScript

Topics: variables, conditions, loops, functions, arrays, objects, DOM, events, ES6 and asynchronous JavaScript.

## Q1. Arithmetic operations
**Question:** Accept two numbers using prompt, perform arithmetic and display using console.log and alert.

**Answer:**
```javascript
const a=Number(prompt("First number")), b=Number(prompt("Second number"));
if(Number.isFinite(a)&&Number.isFinite(b)){const r={sum:a+b,diff:a-b,product:a*b,division:b!==0?a/b:"Cannot divide by zero"};console.log(r);alert(JSON.stringify(r));}
```

## Q2. Prime or composite
**Question:** Check if a number is prime or composite and show result in a div.

**Answer:**
```javascript
function check(n){if(n<2)return "Neither prime nor composite";for(let i=2;i<=Math.sqrt(n);i++)if(n%i===0)return "Composite";return "Prime"}
const n=Number(prompt("Enter number"));document.body.innerHTML="<div>"+check(n)+"</div>";
```

## Q3. Grade calculation
**Question:** Use if-else and switch to determine grade from marks.

**Answer:**
```javascript
const marks=Number(prompt("Marks"));let grade;if(marks>=90)grade="A";else if(marks>=75)grade="B";else if(marks>=60)grade="C";else grade="D";
switch(grade){case "A":case "B":case "C":case "D":alert("Grade: "+grade);break;default:alert("Invalid marks");}
```

## Q4. Fibonacci series
**Question:** Generate Fibonacci series for n terms using loops.

**Answer:**
```javascript
const n=Number(prompt("Terms"));let a=0,b=1,s=[];for(let i=0;i<n;i++){s.push(a);[a,b]=[b,a+b]}document.body.textContent=s.join(", ");
```

## Q5. Reverse and palindrome
**Question:** Reverse a string and check palindrome.

**Answer:**
```javascript
const s=prompt("Enter text")||"", rev=[...s].reverse().join("");alert("Reverse: "+rev+"\nPalindrome: "+(s.toLowerCase()===rev.toLowerCase()));
```

## Q6. Array methods
**Question:** Add, remove, sort and filter array elements using array methods.

**Answer:**
```javascript
let a=[5,2,8,1];a.push(9);a.pop();const doubled=a.map(x=>x*2), filtered=a.filter(x=>x>3);a.sort((x,y)=>x-y);console.log({a,doubled,filtered});
```

## Q7. Student object and this
**Question:** Create student object with properties and methods using this.

**Answer:**
```javascript
const student={name:"Aman",marks:85,show(){return this.name+" scored "+this.marks}};console.log(student.show());
```

## Q8. Calculator events
**Question:** Create calculator using addEventListener click events.

**Answer:**
```javascript
<input id="a" type="number"><input id="b" type="number"><button id="add">Add</button><p id="result"></p><script>document.querySelector("#add").addEventListener("click",()=>result.textContent=Number(a.value)+Number(b.value));</script>
```

## Q9. DOM creation
**Question:** Create and append DOM elements from user input.

**Answer:**
```javascript
<input id="item"><button id="add">Add</button><ul id="list"></ul><script>add.addEventListener("click",()=>{if(item.value.trim()){const li=document.createElement("li");li.textContent=item.value;list.appendChild(li);item.value=""}})</script>
```

## Q10. Password validation
**Question:** Check password and confirm password before submit.

**Answer:**
```javascript
<form id="f"><input id="p" type="password" required><input id="c" type="password" required><button>Submit</button><p id="msg"></p></form><script>f.addEventListener("submit",e=>{if(p.value!==c.value){e.preventDefault();msg.textContent="Passwords do not match"}})</script>
```

## Q11. Mouse events
**Question:** Change element background on mouseover and mouseout.

**Answer:**
```javascript
<p id="box">Move mouse here</p><script>box.addEventListener("mouseover",()=>box.style.background="lightblue");box.addEventListener("mouseout",()=>box.style.background="white")</script>
```

## Q12. Digital clock
**Question:** Display live time using Date and setInterval.

**Answer:**
```javascript
<h2 id="clock"></h2><script>function tick(){clock.textContent=new Date().toLocaleTimeString()}tick();setInterval(tick,1000)</script>
```

## Q13. Closure counter
**Question:** Create private counter with increment and decrement.

**Answer:**
```javascript
function makeCounter(){let count=0;return {inc(){return ++count},dec(){return --count},value(){return count}}}const c=makeCounter();console.log(c.inc(),c.inc(),c.dec(),c.value());
```

## Q14. Exception handling
**Question:** Parse JSON using try, catch and finally.

**Answer:**
```javascript
const json='{"name":"Aman"}';try{const obj=JSON.parse(json);console.log(obj.name)}catch(e){console.error("Invalid JSON")}finally{console.log("Parsing finished")}
```

## Q15. ES6 features
**Question:** Demonstrate arrow function, template literal and destructuring.

**Answer:**
```javascript
const user={name:"Riya",age:20};const {name,age}=user;const greet=(n)=>`Hello ${n}, age ${age}`;console.log(greet(name));
```

## Q16. Image gallery
**Question:** Cycle through images using Next and Previous buttons.

**Answer:**
```javascript
const imgs=["one.jpg","two.jpg","three.jpg"];let i=0;function show(){photo.src=imgs[i]}function next(){i=(i+1)%imgs.length;show()}function prev(){i=(i-1+imgs.length)%imgs.length;show()}
```

## Q17. Vowel count
**Question:** Count vowels in a paragraph.

**Answer:**
```javascript
const text=prompt("Enter paragraph")||"";const count=(text.match(/[aeiou]/gi)||[]).length;alert("Vowels: "+count);
```

## Q18. Todo list
**Question:** Add and delete tasks in an unordered list.

**Answer:**
```javascript
<input id="task"><button id="add">Add</button><ul id="tasks"></ul><script>add.onclick=()=>{if(task.value.trim()){const li=document.createElement("li");li.textContent=task.value;const del=document.createElement("button");del.textContent="Delete";del.onclick=()=>li.remove();li.append(" ",del);tasks.append(li);task.value=""}}</script>
```

## Q19. Keyboard events
**Question:** Display pressed key using keydown and keyup.

**Answer:**
```javascript
<input id="keybox" placeholder="Press a key"><p id="out"></p><script>keybox.addEventListener("keydown",e=>out.textContent=`Key: ${e.key}, Code: ${e.code}`);keybox.addEventListener("keyup",e=>console.log("Released:",e.key));</script>
```

## Q20. Dynamic table
**Question:** Generate table from entered row and column counts.

**Answer:**
```javascript
<input id="rows" type="number" placeholder="Rows"><input id="cols" type="number" placeholder="Columns"><button id="go">Create</button><div id="result"></div><script>go.onclick=()=>{result.innerHTML="";const t=document.createElement("table");t.border="1";for(let r=0;r<Number(rows.value);r++){const tr=t.insertRow();for(let c=0;c<Number(cols.value);c++)tr.insertCell().textContent=`R${r+1} C${c+1}`}result.append(t)}</script>
```

## Q21. Callback and async
**Question:** Demonstrate callback and setTimeout.

**Answer:**
```javascript
function done(value,callback){setTimeout(()=>callback("Completed: "+value),500)}done("Task",message=>console.log(message));
```
