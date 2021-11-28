import './styles/app.scss';
import React from 'react';
import { render } from 'react-dom';
import { BrowserRouter } from "react-router-dom";
import App from "./App/App";

const rootElement = document.getElementById("tasklist-manager-app");

render(
    <BrowserRouter>
        <App />
    </BrowserRouter>,
    rootElement
);
