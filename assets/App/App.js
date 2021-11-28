import React, { Component } from 'react';
import { Route, Routes} from "react-router-dom";
import LoginPage from "./Security/LoginPage";
import SigninPage from "./Security/SigninPage";
import TasklistManager from "./TasklistManager/TasklistManager";

export default class App extends Component {

    componentDidMount() {
        if(window.user){
            console.log(window.user)
        }
    }

    render() {
        return(
            <Routes>
                <Route exact path="/" element={<TasklistManager/>} />
                <Route exact path="/connexion" element={<LoginPage />} />
                <Route exact path="/inscription" element={<SigninPage />} />
            </Routes>
        )
    }
}