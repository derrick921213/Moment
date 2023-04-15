from flask import Flask, request, abort, jsonify
from flask_restful import Resource, Api
app = Flask(__name__)
api = Api(app)
class Helloworld(Resource):
    def get(self):
        return {'message':'hello world'}

class Test(Resource):
    def get(self):
        return {'message':'TEST'}

api.add_resource(Helloworld, '/')
api.add_resource(Test,'/test')
if __name__ == "__main__":
    app.run(host='0.0.0.0')


# @app.route("/")
# def hello():
#     return "<h1 style='color:blue'>Hello There!</h1>"

# @app.route('/getSquare', methods=['POST'])
# def get_square():
#     if not request.json or 'number' not in request.json:
#         abort(400)
#     num = request.json['number']

#     return jsonify({'answer': num ** 2})