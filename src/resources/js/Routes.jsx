import React from "react";
import {
    Routes,
    Route,
  } from "react-router-dom";


import AppHome from './components/AppHome';

class AppRoutes extends React.Component {
    render() {
        return(
            <Routes>
                <Route path="/" element={<AppHome/>} />
                <Route path="/about" element={<AppHome/>} />
            </Routes>
        )
    }
}



export default AppRoutes;
