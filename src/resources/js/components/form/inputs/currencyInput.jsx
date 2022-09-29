import React from "react";
import HttpService from "../../../services/HttpService";

class CurrencyInput extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            value:this.props.value,
            currencyOptionsInput:<></>
        }

        this.valueChangeHandler = this.valueChangeHandler.bind(this);
        this.loadOriginCurrencies = this.loadOriginCurrencies.bind(this);
    }

    valueChangeHandler(event) {
        if (this.props.readOnly===false) {
            this.setState({value: event.target.value});
            this.props.valueChangeHandler(event.target.value);
        }
    }

    loadOriginCurrencies() {
        HttpService.exec({
            "url":this.props.valuesOptionSourceURL,
            "method":"get",
        }).then(options => {
            let inputOptions = options.map((item, i) => {
                return (
                    <option key={'origin-c-'+i} value={item.id}>
                        {item.label}
                    </option>)
            });

            let inputElement = <select
                className="input-dropdown"
                name={this.props.selectName}>
                {inputOptions}
            </select>

            this.setState({currencyOptionsInput:inputElement})
        })
    }

    componentDidMount() {
        this.loadOriginCurrencies()
    }

    render() {
        return (
        <div className="input-currency-container">
            <div className="input-label-block">
                <label >{this.props.label}</label>
            </div>
            <div className="input-money-block">
                <input
                    type="number"
                    name={this.props.inputName}
                    value={this.props.value}
                    onChange={this.valueChangeHandler} />
            </div>
            <div className="input-currency-block">
                {this.state.currencyOptionsInput}
            </div>
        </div>
        )
    }
}

export default CurrencyInput;
