import { defaults } from "lodash";
import React from "react";
import CurrencyInput from '../components/form/inputs/currencyInput';

class Dashboard extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            inputOriginCurrency:<></>,
            origin:{currency:1, value:0},
            target:{currency:null, value:0}
        }

        this.convertHandler = this.convertHandler.bind(this)
        this.originValueChangeHandler = this.originValueChangeHandler.bind(this)
    }

    originValueChangeHandler(value) {
        let origin = this.state.origin;
        let target = this.state.target;

        origin.value = value;
        target.value = (value / 5.35).toFixed(2);

        this.setState({origin: origin});
        this.setState({target: target});
    }

    convertHandler() {
        console.log("Origin: ", this.state.origin);
        console.log("Target: ", this.state.target);
    }

    componentDidMount() {
        console.log('componentDidMount')
    }

    render() {
        return(
            <>
            <section className="page-section">
                <CurrencyInput
                    label="Moeda origem"
                    inputName="origin_currency_value"
                    selectName="origin_currency_option"
                    valuesOptionSourceURL="/api/currencies/origins"
                    value={this.state.origin.value}
                    readOnly={false}
                    valueChangeHandler={this.originValueChangeHandler}
                />
                <CurrencyInput
                    label="Moeda origem"
                    inputName="target_currency_value"
                    selectName="target_currency_option"
                    valuesOptionSourceURL="/api/currencies/targets"
                    value={this.state.target.value}
                    readOnly={true}
                    valueChangeHandler={this.originValueChangeHandler}
                />
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
