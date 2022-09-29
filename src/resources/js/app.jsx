import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter } from "react-router-dom";
import AppRoutes from './Routes';

import './../css/app.css';

import './bootstrap';


const root = ReactDOM.createRoot(document.getElementById('app-root'));
root.render(
  <React.StrictMode>
    <BrowserRouter>
        <div className="App">
          <header className="App-header">
            <p>Painel de conversão de moedas</p>
          </header>
          <main>
            <div id="content-container">
                <AppRoutes />
            </div>
            </main>
        </div>
    </BrowserRouter>
  </React.StrictMode>
);
