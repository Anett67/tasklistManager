import React, { Component } from 'react';

export default class LoginPage extends Component{
    render() {
        return <div id="login-page">
            <h3>Se connecter</h3>
            <form>
                <div className="form-ctrl">
                    <label htmlFor="email">Email</label>
                    <input id={"email"} type="text"/>
                </div>
                <div className="form-ctrl">
                    <label htmlFor="password">Mot de passe</label>
                    <input id={"password"} type="text"/>
                </div>
                <button className={"confirm-btn"}>Se connecter</button>
            </form>
        </div>
    }
}