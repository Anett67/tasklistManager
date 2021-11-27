import React, { Component } from 'react';

export default class App extends Component {

    componentDidMount() {
        if(window.user){
            console.log(window.user)
        }
    }

    render() {
        return <div>App</div>
    }
}