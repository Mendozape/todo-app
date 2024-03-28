import { createRoot } from 'react-dom/client';
import React, { useState } from 'react';
//import 'material-icons/iconfont/material-icons.css';
import 'material-symbols';
import '../css/increment.css';

export default function MyApp() {
    return (
        <div class="container border border-1 col-lg-12  " >
            <div className="position btn-group " >
                <iframe width={820} height={430} src="https://www.youtube.com/embed/tgbNymZ7vqY">
                </iframe>
            </div>
        </div>
    );
}




if (document.getElementById('video')) {
    createRoot(document.getElementById('video')).render(<MyApp />)
}
