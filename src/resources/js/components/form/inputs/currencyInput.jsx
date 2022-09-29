import React from "react";

class CurrencyInput extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            value:0,
            currencyOptionsInput:<></>
        }

        this.valueChangeHandler = this.valueChangeHandler.bind(this);
        this.loadOriginCurrencies = this.loadOriginCurrencies.bind(this);
    }

    valueChangeHandler(event) {
        this.setState({value: event.target.value});
        this.props.valueChangeHandler(event.target.value);
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

        this.setState({currencyOptionsInput:inputElement})
    }

    componentDidMount() {
        this.loadOriginCurrencies()
    }

    render() {
        return (
        <div className="input-currency-container">
            <div className="input-label-block">
                <label htmlFor="origin_value_input">{this.props.label}</label>
            </div>
            <div className="input-money-block">
                <input
                    type="number"
                    name={this.props.name}
                    value={this.state.value}
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
