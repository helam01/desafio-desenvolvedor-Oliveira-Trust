import { defaults } from "lodash";
import React from "react";

class Dashboard extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            inputOriginCurrency:<></>,
            origin:{currency:1, value:0},
            targer:{currency:null, value:0}
        }

        this.loadOriginCurrencies = this.loadOriginCurrencies.bind(this)
        this.convertHandler = this.convertHandler.bind(this)
        this.originValueChangeHandler = this.originValueChangeHandler.bind(this)
    }

    loadOriginCurrencies() {
        let options =  [
            {
                id:1,
                name:'BRL',
            }
        ];

        let inputOptions = options.map((item, i) => {
            return (
                <option key={'origin-c-'+i} value={item.id}>
                    {item.name}
                </option>)
        });

        let inputElement = <select
            className="input-dropdown"
            name="origin_currency">
            {inputOptions}
        </select>

        this.setState({inputOriginCurrency:inputElement})
    }

    loadTargetCurrencies() {
        return [
            {
                id:2,
                name:'USD'
            },
            {
                id:3,
                name:'EUR'
            },
        ];
    }

    originValueChangeHandler(event) {
        let origin = this.state.origin;
        origin.value = event.target.value;

        this.setState({origin: origin});
    }

    convertHandler() {
        console.log("Origin: ", this.state.origin);
    }

    componentDidMount() {
        this.loadOriginCurrencies()
    }

    render() {
        return(
            <>
            <section className="page-section">
                <div className="input-currency-container">
                    <div className="input-label-block">
                        <label htmlFor="origin_value_input">Moeda origem</label>
                    </div>
                    <div className="input-money-block">
                        <input
                            id="origin_value_input"
                            type="number"
                            name="value"
                            value={this.state.origin.value}
                            onChange={this.originValueChangeHandler} />
                    </div>
                    <div className="input-currency-block">
                        {this.state.inputOriginCurrency}
                    </div>
                </div>
                <div className="input-action-container">
                    <button
                        id="btn-convert"
                        onClick={this.convertHandler}>
                            Converter</button>
                </div>
            </section>
            </>
        )
    }
}

export default Dashboard
