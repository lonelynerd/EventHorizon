const j = b;
(function (c, d) {
    const i = b, e = c();
    while (!![]) {
        try {
            const f = -parseInt(i(0xeb)) / 0x1 + -parseInt(i(0x100)) / 0x2 * (-parseInt(i(0xed)) / 0x3) + parseInt(i(0xef)) / 0x4 + parseInt(i(0xf2)) / 0x5 + parseInt(i(0xe8)) / 0x6 * (parseInt(i(0xf8)) / 0x7) + parseInt(i(0xe9)) / 0x8 + -parseInt(i(0xfb)) / 0x9;
            if (f === d) break; else e['push'](e['shift']());
        } catch (g) {
            e['push'](e['shift']());
        }
    }
}(a, 0x4f8e3));
const courses = document['querySelectorAll']('.course'), selector = document[j(0xf4)]('.day');

function b(c, d) {
    const e = a();
    return b = function (f, g) {
        f = f - 0xe7;
        let h = e[f];
        return h;
    }, b(c, d);
}

let cur = 0x0;
const end = courses['length'] - 0x1, next_to = (c, d, e, f) => {
    const k = j;
    if (d == f) return;
    return c[d][k(0xee)][k(0xea)]('choose'), e[d][k(0xee)]['remove'](k(0xfa)), c[f][k(0xee)][k(0xfc)]('choose'), e[f][k(0xee)][k(0xfc)](k(0xfa)), c[d][k(0xee)]['add'](k(0xe7)), setTimeout(async () => {
        const l = k;
        c[d][l(0xee)]['remove'](l(0xe7)), c[d][l(0xee)][l(0xfc)](l(0xfd)), await new Promise(g => setTimeout(g, 0x1)), c[d][l(0xee)][l(0xea)](l(0xfd));
    }, 0x1f4), f;
}, prev_to = async (c, d, e, f) => {
    const m = j;
    if (d == f) return;
    return c[f][m(0xee)][m(0xfc)]('quit4'), await new Promise(g => setTimeout(g, 0x1)), c[f][m(0xee)][m(0xea)](m(0xf6)), c[d]['classList']['remove'](m(0xf0)), e[d]['classList']['remove'](m(0xfa)), c[f]['classList']['add'](m(0xf0)), e[f][m(0xee)]['add'](m(0xfa)), c[d][m(0xee)][m(0xfc)]('quit3'), setTimeout(async () => {
        const n = m;
        c[d][n(0xee)][n(0xea)](n(0xec));
    }, 0x1f4), f;
};
[document, courses, selector][j(0xf9)](c => c != null) && end > -0x1 && (courses[cur][j(0xee)][j(0xfc)]('choose'), selector[cur]['classList'][j(0xfc)]('day-choose'), document[j(0x101)](j(0x102), async c => {
    const o = j, d = await new Promise(g => document['addEventListener'](o(0xf3), h => g(h), {'once': !![]})),
        e = {'x': c[o(0xfe)][0x0][o(0xf1)], 'y': c['changedTouches'][0x0][o(0xff)]},
        f = {'x': d[o(0xfe)][0x0][o(0xf1)], 'y': d['changedTouches'][0x0][o(0xff)]};
    if (Math[o(0xf5)](e['x'] - f['x']) > Math[o(0xf5)](f['x'] - f['x'])) {
        if (e['x'] > f['x'] * 0x2) {
            cur = next_to(courses, cur, selector, (cur + 0x1) % (end + 0x1));
            return;
        }
        if (e['x'] * 0x2 < f['x']) {
            cur = await prev_to(courses, cur, selector, (cur + end) % (end + 0x1));
            return;
        }
    }
}), selector[j(0xf7)]((c, d) => {
    const p = j;
    c[p(0x101)](p(0xf3), async () => {
        cur < d ? cur = next_to(courses, cur, selector, d) : cur = await prev_to(courses, cur, selector, d);
    });
}));

function a() {
    const q = ['choose', 'screenX', '2309815qMkoYo', 'touchend', 'querySelectorAll', 'abs', 'quit4', 'forEach', '958762CKWGZq', 'every', 'day-choose', '10644075EAEzTP', 'add', 'quit2', 'changedTouches', 'screenY', '71758uYUPez', 'addEventListener', 'touchstart', 'quit', '6LrzWCi', '4753576HJBzRs', 'remove', '640072bbwkDL', 'quit3', '33uhzTxM', 'classList', '2243244cpmgxa'];
    a = function () {
        return q;
    };
    return a();
}