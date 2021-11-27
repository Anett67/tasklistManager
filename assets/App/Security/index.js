import React, { Component } from 'react';
import LoginPage from "./Components/LoginPage";
import SigninPage from "./Components/SigninPage";
import { Link } from "react-router-dom";

export default class SecurityPage extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        let formToShow;
        let link;

        if(this.props.form === 'login'){
            formToShow = <LoginPage />
            link = <Link to="/inscription">S'inscrire</Link>
        }else if(this.props.form === 'inscription'){
            formToShow = <SigninPage/>
            link = <Link to="/login" >Se connecter</Link>
        }

        return <div className="flex mh-100-vh">
            <div className="w-25 image-wrapper"></div>
            <div className="w-75 flex flex-column align-items-center">
                {formToShow}
                {link}
            </div>
        </div>
    }
}