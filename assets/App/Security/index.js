import React, { Component } from 'react';
import LoginPage from "./Components/LoginPage";
import SigninPage from "./Components/SigninPage";

export default class SecurityPage extends Component {
    constructor(props) {
        super(props);
        this.state = {showLoginForm: true};
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
                <button onClick={this.handleToggleClick}>{this.state.showLoginForm ? 'Sign In' : 'Log In'}</button>
            </div>
        </div>
    }
}