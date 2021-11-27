import './styles/app.scss';
import React from 'react';
import { render } from 'react-dom';
import { BrowserRouter, Route, Routes } from "react-router-dom";
import App from "./App/App";
import SecurityPage from "./App/Security";

const rootElement = document.getElementById("tasklist-manager-app");
render(
    <BrowserRouter>
        <Routes>
            <Route path="/" element={<App />} />
            <Route path="/connexion" element={<SecurityPage form={'login'} />} />
            <Route path="/inscription" element={<SecurityPage form={'inscription'} />} />
        </Routes>
    </BrowserRouter>,
    rootElement
);
