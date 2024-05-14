export function utils() {

    function flattenJSON(obj) {
        let result = [];

        function flatten(obj, path = '') {
          for (let key in obj) {
            let newPath = path ? path + '.' + key : key;
            if (typeof obj[key] === 'object') {
              flatten(obj[key], newPath);
            } else {
              result.push(obj[key]);
            }
          }
        }

        flatten(obj);
        return result.join(', ');
    }

    return {
        flattenJSON,
    }
}
