class queue {
    constructor() {
        this.queue = [];
    }

    push(ele) {
        this.queue.push(ele);
    }

    pop() {
        this.queue.pop();
    }

    size() {
        return this.queue.length;
    }

    empty() {
        return this.size() == 0;
    }

    front() {
        return this.queue[this.queue.length - 1];
    }
}

const displayExpression = document.querySelector('#expression');
const displayCurrentValue = document.querySelector('#curVal');
const buttons = document.querySelectorAll('.btn');

let currExpr = "";
let currVal = "";
let st = new queue();

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        function isOperation(op) {
            return op === '+' || op === '-' || op === 'x' || op === '/' || op === '%' || op === '^';
        }

        function isInt(n){
            return Number(n) === n && n % 1 === 0;
        }
        
        function isFloat(n){
            return Number(n) === n && n % 1 !== 0;
        }

        function cal(val1, op, val2) {
            val1 = val1.toString().includes('.') ? parseFloat(val1) : parseInt(val1);
            val2 = val2.toString().includes('.') ? parseFloat(val2) : parseInt(val2);

            if(op === '+') {
                return val1 + val2;
            }

            if(op === '-') {
                return val1 - val2;
            }

            if(op === 'x') {
                return val1 * val2;
            }

            if(op === '/') {                
                return (val2 == 0) ? 'Result not determined' : val1 / val2;
            }

            if(op === '%') {
                return (isFloat(val1) || isFloat(val2)) ? 'Error Type' : val1 % val2;
            }

            return Math.pow(val1, val2);
        }

        function parseNum(val) {
            return val.includes('.') ? parseFloat(val) : parseInt(val);
        }

        const value = button.textContent.trim();

        if(value === 'AC') {
            currExpr = currVal = "";
            st = new stack();
            displayExpression.value = '';
            displayCurrentValue.value = '0';
            return;
        }

        if(value === '=') {
            let isOp = false;
            let ans = 0;
            let first = true;
            let op = NaN;

            while(!st.empty()) {
                let temp = st.front(); st.pop();
                
                if(isOperation(temp)) {
                    op = temp;
                    isOp = true;
                    continue;
                }

                isOp = false;
                if(first) {
                    ans = parseNum(temp);
                    first = false;
                    continue;
                }

                ans = cal(parseNum(temp), op, ans);
            }

            if(isOp) {
                ans
            }
            st.push(ans);
            displayCurrentValue.value = ans;
            return;
        }        
        
        if(isOperation(value)) {
            if(st.empty()) {
                st.push('0');
                st.push(value);
                currExpr = '0' + value;
                return;
            }

            if(isOperation(st.front())) {
                st.pop();
                currExpr = currExpr.slice(0, -1);                
            }

            st.push(value);
            currVal = "";
            currExpr += value;
            displayExpression.value = currExpr;
            return;
        }
        
        currVal += value;
        currExpr += value;
        displayCurrentValue.value = currVal;
        displayExpression.value = currExpr;
        if(st.empty() || isOperation(st.front())) {
            st.push(currVal);
        } else {
            let temp = st.front();
            st.pop();

            st.push(temp + value + value);
        }

        displayExpression.scrollLeft = displayExpression.scrollWidth;
    });
});

displayExpression.scrollLeft = displayExpression.scrollWidth;