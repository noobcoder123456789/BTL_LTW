class deque {
    constructor() {
        this.deque = [];
    }

    push_back(ele) {
        this.deque.push(ele);
    }

    push_front(ele) {
        this.deque.unshift(ele);
    }

    pop_front() {
        this.deque.shift();
    }

    pop_back() {
        this.deque.pop();
    }

    size() {
        return this.deque.length;
    }

    empty() {
        return this.deque.length === 0;
    }

    front() {
        return this.deque[0];
    }

    back() {
        return this.deque[this.deque.length - 1];
    }
}

const displayExpression = document.querySelector('#expression');
const displayCurrentValue = document.querySelector('#curVal');
const buttons = document.querySelectorAll('.btn');

let currExpr = "";
let currVal = "";
let st = new deque();

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        function isOperation(op) {
            return op === '+' || op === '-' || op === 'x' || op === '/' || op === '%' || op === '^';
        }

        function isInt(n) {
            return Number.isInteger(Number(n));
        }
        
        function isFloat(n) {
            return !isNaN(n) && !Number.isInteger(Number(n));
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
            return val.toString().includes('.') ? parseFloat(val) : parseInt(val);
        }

        const value = button.textContent.trim();

        if(value === 'AC') {
            currExpr = currVal = "";
            st = new deque();
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
                let temp = st.front(); st.pop_front();
                
                if(isOperation(temp)) {
                    op = temp;
                    isOp = true;
                    continue;
                }

                isOp = false;
                if(first) {
                    ans += parseNum(temp);
                    first = false;
                    continue;
                }
                
                ans = cal(ans, op, temp);
            }
            
            if(isOp) {
                ans = cal(ans, op, ans);
            }

            st.push_back(ans);
            currExpr = ans;
            displayExpression.value = ans;
            displayCurrentValue.value = '';
            return;
        }        
        
        if(isOperation(value)) {
            if(st.empty()) {
                st.push_back('0');
                st.push_back(value);
                currExpr = '0' + value;
                return;
            }

            if(isOperation(st.back())) {
                st.pop_back();
                currExpr = currExpr.slice(0, -1);
            }

            st.push_back(value);
            currVal = "";
            currExpr += value;
            displayExpression.value = currExpr;
            return;
        }
        
        currVal += value;
        currExpr += value;
        displayCurrentValue.value = currVal;
        displayExpression.value = currExpr;
        if(st.empty() || isOperation(st.back())) {
            st.push_back(currVal);
        } else {
            let temp = st.back(); st.pop_back();
            st.push_back(temp.toString() + value);
        }

        displayExpression.scrollLeft = displayExpression.scrollWidth;
    });
});

displayExpression.scrollLeft = displayExpression.scrollWidth;