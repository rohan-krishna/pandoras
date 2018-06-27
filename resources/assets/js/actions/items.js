import { ITEMS_HAS_ERRORED, ITEMS_IS_LOADING, ITEMS_LOAD_DATA_SUCCESS } from '../constants/action-types';
import axios from 'axios';

// Sync Actions
export const itemsHasErrored  = (bool) => {
    return {
        type: ITEMS_HAS_ERRORED,
        itemsHasErrored: bool
    }
}

export const itemsIsLoading = (bool) => {
    return {
        type: ITEMS_IS_LOADING,
        itemsIsLoading: bool
    }
}

export const itemsLoadSuccess = (items) => {
    return {
        type: ITEMS_LOAD_DATA_SUCCESS,
        items
    }
}

// Async Function
export const itemsLoadData = (url) => {
    return (dispatch) => {
        dispatch(itemsIsLoading(true));

        axios.get(url)
            .then( (items) => {
                dispatch(itemsLoadSuccess(items))
            })
            .catch(err => {
                dispatch(itemsHasErrored(true))
            })
    }
}