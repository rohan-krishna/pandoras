import React, { Component } from 'react';
import { render } from 'react-dom';
import { Provider } from 'react-redux';
import configureStore from '../store/configureStore';

const store = configureStore();

render(
    <Provider store={store}>
        <h3>Redux-Thunk - Edit ItemsApp.js</h3>
    </Provider>,
    document.getElementById('itemsApp')
)