function makeCounter(){let count=0;return {inc(){return ++count},dec(){return --count},value(){return count}}}const c=makeCounter();console.log(c.inc(),c.inc(),c.dec(),c.value());
