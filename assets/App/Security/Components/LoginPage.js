import React, { Component } from 'react';

export default class LoginPage extends Component{

    handleFormSubmit = (event) => {
        event.preventDefault()
        console.log('Log in submit');
    }

    render() {
        return <div id="login-page">
            <h3 className={"text-xxxl mg-b-m text-primary"}>Se connecter</h3>
            <form onSubmit={this.handleFormSubmit}>
                <div className="form-ctrl form-ctrl--bg-light">
                    <label htmlFor="email">Email</label>
                    <input id={"email"} placeholder="Votre adresse mail" type="text"/>
                </div>
                <div className="form-ctrl form-ctrl--bg-light">
                    <label htmlFor="password">Mot de passe</label>
                    <input id={"password"} placeholder="Mot de passe" type="text"/>
                </div>
                <button className={"btn btn-confirm btn--big w-100 mg-t-l"}>Se connecter</button>
            </form>
        </div>
    }
}