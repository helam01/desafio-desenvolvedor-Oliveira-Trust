import React from "react";
import {
    Routes,
    Route,
  } from "react-router-dom";


  import AppHome from './components/AppHome';
  import Dashboard from './pages/Dashboard';

class AppRoutes extends React.Component {
    render() {
        return(
            <div id="page-container">
                <Routes>
                    <Route path="/" element={<Dashboard/>} />
                    <Route path="/about" element={<AppHome/>} />
                </Routes>
            </div>
        )
    }
}



export default AppRoutes;
