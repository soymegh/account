const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')

// color primario de la aplicacion
const primaryColor = '#9d69d4'

// Let's create a plugin that adds utilities!
const capitalizeFirst = plugin(function ({ addUtilities }) {
    const newUtilities = {
        '.capitalize-first:first-letter': {
            textTransform: 'uppercase'
        }
    }
    addUtilities(newUtilities, ['responsive', 'hover'])
})

const hexToRgb = (hex) => {
    // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
    const shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
    hex = hex.replace(shorthandRegex, function(m, r, g, b) {
        return r + r + g + g + b + b;
    });

    const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

function withOpacityValue(color) {
    if (color) {
        return ({ opacityValue }) => {
            if (opacityValue === undefined) {
                return `rgb(${color.r}, ${color.g}, ${color.b})`
            }
            return `rgb(${color.r} ${color.g} ${color.b} / ${opacityValue})`
        }
    }
    return primaryColor
}

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/@protonemedia/inertiajs-tables-laravel-query-builder/**/*.{js,vue}',    
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            // Build your palette here
            primary: withOpacityValue(hexToRgb(primaryColor)),
            transparent: 'transparent',
            current: 'currentColor',
            gray: colors.gray,
            red: colors.red,
            blue: colors.blue,
            yellow: colors.yellow,
            lime: colors.lime,
            orange: colors.orange,
            amber: colors.amber,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            violet: colors.violet,
            purple: colors.purple,
            pink: colors.pink,
            rose: colors.rose,
            indigo: colors.indigo,
            white: colors.white,
            black: colors.black
        }
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
