const s=prompt("Enter text")||"", rev=[...s].reverse().join("");alert("Reverse: "+rev+"\nPalindrome: "+(s.toLowerCase()===rev.toLowerCase()));
