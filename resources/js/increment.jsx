import { createRoot } from 'react-dom/client';
import React, { useState } from 'react';
//import 'material-icons/iconfont/material-icons.css';
import 'material-symbols';
import '../css/increment.css';

const IncrementButton = () => {
    // Define a state variable 'count' with initial value 0
    const [count, setCount] = useState(0);

    // Function to handle incrementing the count
    const increment = () => {
        (count >= 10) ? setCount(10) : setCount(count + 1);
    };
    const decrement = () => {
        (count <= 0) ? setCount(0) : setCount(count - 1);
    };

    return (
        <div class="container border border-1 col-lg-12  " >
            <div className="position btn-group " >
                <button  onClick={increment}>
                    <span class="material-symbols-outlined">add</span>
                </button>
                <pp >{count}</pp>
                <button  onClick={decrement}>
                    <span class="material-symbols-outlined">remove</span>
                </button>
            </div>
        </div>
    );
};

export default IncrementButton;


if (document.getElementById('increment')) {
    createRoot(document.getElementById('increment')).render(<IncrementButton />)
}

