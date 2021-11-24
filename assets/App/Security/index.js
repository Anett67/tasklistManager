import React, { Component } from 'react';
import LoginPage from "./Components/LoginPage";
import SigninPage from "./Components/SigninPage";
import { Link } from "react-router-dom";

export default class SecurityPage extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showLoginForm: true,
            theme: 'spring'
        };
        this.handleToggleClick = this.handleToggleClick.bind(this);
    }

    handleToggleClick() {
        this.setState(state => ({
            showLoginForm: !state.showLoginForm
        }));
    }

    render() {

        return <div className="flex mh-100-vh">
            <div className="w-25 image-wrapper"></div>
            <div className="w-75 flex flex-column flex-center align-items-center">
                { this.state.showLoginForm ? <LoginPage/> : <SigninPage/> }
                <Link to="/sign-in">S'inscrire</Link>
            </div>
        </div>
    }
}