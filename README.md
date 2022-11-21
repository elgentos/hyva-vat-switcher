#Hyva VatSwitcher
Adds a vat switcher to the header component to let customer decide on how
to show their prices; including or excluding VAT. The decision is saved to 
the browser storage.

Because there are a lot of prices in magento, there is a reusable alpine
component to switch between prices realtime. It only needs the including 
and excluding price.

###Example with alpine component

```html
            <div x-data="initVatSwitcherPrice()" x-spread="eventListeners">
                <span class="price-incl" x-show="vatMode == 'including'" x-html="hyva.formatPrice('<?= $priceModel->getValue() ?>')"></span>
                <span class="price-excl" x-show="vatMode == 'excluding'" x-html="hyva.formatPrice('<?= $priceModel->getBaseAmount() ?>')"></span>
            </div>

            <script>
                function initVatSwitcherPrice() {
                    return {
                        vatMode: vatSwitcher.getVatMode(),

                        eventListeners: {
                            ['@vat-switched.window'](event) {
                                this.vatMode = event.detail;
                            }
                        }
                    }
                }
            </script>
```

###Example with existing alpine component
Sometimes you will need price info from an already existing price component,
because it is hard to pass data from parent to child components in alpine. In
this case you can simply add the vatmode: `vatMode: vatSwitcher.getVatMode(),`
and the `eventListener` to the existing component:
```js
function initExistingComponent() {
    return {
        vatMode: vatSwitcher.getVatMode(),

        eventListeners: {
            ['@vat-switched.window'](event) {
                this.vatMode = event.detail;
            }
        }
    }
}
```

And make sure the existing component uses: `x-spread="eventListeners"`. No you
can also use code like this in your existing component: 
```html
    <div x-data="initExistingComponent()" x-spread="eventListeners">
        <span class="price-incl" x-show="vatMode == 'including'" x-html="hyva.formatPrice('<?= $priceModel->getValue() ?>')"></span>
        <span class="price-excl" x-show="vatMode == 'excluding'" x-html="hyva.formatPrice('<?= $priceModel->getBaseAmount() ?>')"></span>
    </div>
```
