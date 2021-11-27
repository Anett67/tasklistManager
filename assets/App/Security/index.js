import React, { Component } from 'react';
import LoginPage from "./Components/LoginPage";
import SigninPage from "./Components/SigninPage";

export default class SecurityPage extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        let formToShow;

        if(this.props.form === 'login') {
            formToShow = <LoginPage/>
        } else if (this.props.form === 'inscription') {
            formToShow = <SigninPage/>
        }

        return <div className="flex mh-100-vh">
            <div id="image-wrapper" className="w-25 hide-mobile"></div>
            <div className="security-active-screen w-75 w-m-100 flex flex-column align-items-center">
                {formToShow}
            </div>
        </div>
    }
}