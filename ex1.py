from Flask import Flask, render_template, jsonify

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/get_chart_data')
def get_chart_data():
    # This is just sample data; you can replace it with your own data retrieval logic
    data = {
        'labels': ['January', 'February', 'March', 'April', 'May'],
        'data': [10, 25, 18, 32, 28]
    }
    return jsonify(data)

if __name__ == '__main__':
    app.run(debug=True)
