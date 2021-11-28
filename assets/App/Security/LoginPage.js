import React, { Component } from 'react';
import {Link, Navigate} from "react-router-dom";
import axios from "axios";

export default class LoginPage extends Component{
    constructor(props) {
        super(props);

        this.state = {
            userLoginError: '',
            passwordError: '',
            apiError: '',
            isLoading: false
        };

        this.login = React.createRef();
        this.password = React.createRef();

    }

    redirectAfterLogin = () => {
        window.location.href = '/';
    }

    handleFormSubmit = (event) => {
        event.preventDefault()

        let anyError = false;

        this.setState({
            userLoginError: '',
            passwordError: ''
        })

        //TODO - email validation
        if(this.login.current.value.length < 6){
            this.setState({
                userLoginError: 'Veuillez renseigner un email valid.'
            })
            anyError = true;
        }

        if(this.password.current.value.length < 1){
            this.setState({
                passwordError: 'Le mot de passe doit contenir au moins 1 caractères.'
            })
            anyError = true;
        }

        if (anyError) {
            return;
        }

        this.loginUser(this.login.current.value, this.password.current.value)
        this.login.current.value = '';
        this.password.current.value = '';

    }

    loginUser = (login, password) => {
        this.setState({
            isLoading: true
        })

        axios.post('/login', {
            email: login,
            password: password
        }).then(response => {
            this.redirectAfterLogin();
        }).catch(error => {
            console.error(error);
            if(error.response.data.error){
                this.setState({
                    apiError: error.response.data.error
                })
            }else{
                this.setState({
                    apiError: 'Une erreur technique est survenue'
                })
            }
        }).finally(() => {
            this.setState({
                isLoading: false
            })
        })
    }

    render() {
        const {userLoginError, passwordError, apiError} = {...this.state}

        return <div className="flex mh-100-vh">
            <div id="image-wrapper" className="w-25 hide-mobile"></div>
            <div className="security-active-screen w-75 w-m-100 flex flex-column align-items-center">
                <div id="login-page">
                    <h3 className={"text-xxxl mg-b-m text-primary"}>Se connecter</h3>
                    <form onSubmit={this.handleFormSubmit}>
                        <div className={`form-ctrl form-ctrl--bg-light ${userLoginError ? 'has-error' : ''}`}>
                            <label htmlFor="email">Email</label>
                            <input
                                id={"email"}
                                placeholder="Votre adresse mail"
                                ref={this.login}
                                type="text"/>
                            {userLoginError && <div className="error-message">{userLoginError}</div>}
                        </div>
                        <div className={`form-ctrl form-ctrl--bg-light ${passwordError ? 'has-error' : ''}`}>
                            <label htmlFor="password">Mot de passe</label>
                            <input
                                id={"password"}
                                placeholder="Mot de passe"
                                ref={this.password}
                                type="password"/>
                            {passwordError && <div className="error-message">{passwordError}</div>}
                        </div>
                        {apiError && <div className="api-error error-message">{apiError}</div>}
                        <button className={"btn btn-confirm btn--big w-100 mg-t-l mg-b-m"}>Se connecter</button>
                        <Link to="/inscription">S'inscrire</Link>
                    </form>
                </div>
            </div>
        </div>
    }
}
