import './styles/app.scss';
import React from 'react';
import ReactDom from 'react-dom';

const el = React.createElement('h2', null, 'Coucou React');

ReactDom.render(el, document.getElementById('tasklist-manager-app'));