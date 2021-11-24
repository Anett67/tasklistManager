import React, { Component } from 'react';
import SecurityPage from "./Security";

export default class App extends Component {
    constructor(props) {
        super(props);
        this.state = {
            theme: 'spring'
        };
    }
    render() {
        return <SecurityPage/>
    }
}