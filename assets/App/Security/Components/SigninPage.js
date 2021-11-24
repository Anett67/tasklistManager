import React, { Component } from 'react';

export default class SigninPage extends Component{
    render() {
        return <div id="signin-page">
            <h3>Créer un compte</h3>
            <form>
                <div className="form-ctrl dark">
                    <label htmlFor="first-name">Prénom</label>
                    <input id={"first-name"} type="text"/>
                </div>
                <div className="form-ctrl dark">
                    <label htmlFor="last-name">Nom</label>
                    <input id={"last-name"} type="text"/>
                </div>
                <div className="form-ctrl dark">
                    <label htmlFor="email">Email</label>
                    <input id={"email"} type="text"/>
                </div>
                <div className="form-ctrl dark">
                    <label htmlFor="password">Mot de passe</label>
                    <input id={"password"} type="password"/>
                </div>
                <div className="form-ctrl dark">
                    <label htmlFor="password">Confirmer le m ot de passe</label>
                    <input id={"password"} type="password"/>
                </div>
                <button className={"confirm-btn"}>S'inscrire</button>
            </form>
        </div>
    }
}