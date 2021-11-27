import React, { Component } from 'react';
import {Link} from "react-router-dom";

export default class SigninPage extends Component{

    handleFormSubmit = (event) => {
        event.preventDefault()
        console.log('Sign in submit');
    }

    render() {
        return <div id="signup-page">
            <h3 className={"text-xxxl mg-b-m text-primary"}>Créer un compte</h3>
            <form onSubmit={this.handleFormSubmit}>
                <div className="form-ctrl form-ctrl--bg-light">
                    <label htmlFor="first-name">Prénom</label>
                    <input id={"first-name"} placeholder="Votre prénom" type="text"/>
                </div>
                <div className="form-ctrl form-ctrl--bg-light">
                    <label htmlFor="last-name">Nom</label>
                    <input id={"last-name"} placeholder="Votre nom" type="text"/>
                </div>
                <div className="form-ctrl form-ctrl--bg-light">
                    <label htmlFor="email">Email</label>
                    <input id={"email"} placeholder="Votre adresse mail" type="text"/>
                </div>
                <div className="form-ctrl form-ctrl--bg-light">
                    <label htmlFor="password">Mot de passe</label>
                    <input id={"password"} placeholder="Votre mot de passe" type="password"/>
                </div>
                <div className="form-ctrl form-ctrl--bg-light">
                    <label htmlFor="password">Confirmer le mot de passe</label>
                    <input id={"password"} placeholder="Veuillez confirmer le mot de passe" type="password"/>
                </div>
                <button className={"btn btn-confirm btn--big w-100 mg-t-l mg-b-m"}>S'inscrire</button>
                <Link to="/connexion" >Se connecter</Link>
            </form>
        </div>
    }
}