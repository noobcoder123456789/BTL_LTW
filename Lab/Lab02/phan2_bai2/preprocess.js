class stack {
    constructor() {
        this.stack = [];
    }

    push(ele) {
        this.stack.push(ele);
    }

    pop() {
        this.stack.pop();
    }

    size() {
        return this.stack.length;
    }

    empty() {
        return this.size() == 0;
    }

    top() {
        return this.stack[this.stack.length - 1];
    }
}

const displayExpression = document.querySelector('#expression');
const displayCurrentValue = document.querySelector('#curVal');
const buttons = document.querySelectorAll('.btn');

let currExpr = "";
let currVal = "";
let st = new stack();

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        function isOperation(op) {
            return op === '+' || op === '-' || op === 'x' || op === '/' || op === '%' || op === '^';
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
            for(; !st.empty(); st.pop()) {
                let temp = st.top(); 
                
                if(isOperation(temp)) {
                    isOp = true;
                }
            }

            return;
        }        
        
        if(isOperation(value)) {
            if(st.empty()) {
                st.push('0');
                st.push(value);
                currExpr = '0' + value;
                return;
            }

            if(isOperation(st.top())) {
                st.pop();
                currExpr = currExpr.substring(0, currExpr.length - 1);
                currExpr += value;
            }

            st.push(value);
            currVal = "";
            displayExpression.value = currExpr;
            return;
        }
        
        currVal += value;
        currExpr += value;
        displayCurrentValue.value = currVal;
        displayExpression.value = currExpr;
        if(st.empty() || isOperation(st.top())) {
            st.push(currVal);
        } else {
            let temp = st.top();
            st.pop();

            st.push(temp + value + value);
        }

        displayExpression.scrollLeft = displayExpression.scrollWidth;
    });
});

displayExpression.scrollLeft = displayExpression.scrollWidth;