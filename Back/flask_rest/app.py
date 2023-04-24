from flask import Flask, request, abort, jsonify,send_file
from flask_restful import Resource, Api
import logging,os
app = Flask(__name__)
api = Api(app)

user_list = []

class User(Resource):
    def get(self,username):
        for user in user_list: 
            if user['username'] == username:
                return user
        return {'username':None},404
    
    def post(self,username):
        user = {
            'username': username,
            'email': request.get_json().get('email')
        }
        user_list.append(user)
        return user
    
    def delete(self,username):
        for ind,user in enumerate(user_list):
            if user['username'] == username:
                delete_user = user_list.pop(ind)
                return {'note':'Successfully Deleted'}

    def put(self, username):
        user_find = None
        for user in user_list:
            if user['username'] == username:
                user_find = user
        if user_find:
            user_list.remove(user_find)
            user_find['email'] = request.get_json().get('email')
            user_list.append(user_find)
            return user_find
        
class UserList(Resource):
    def get(self):
        return {'user_list': user_list}
    
class GetFile(Resource):
    def get(self,filename):
        Base = os.path.dirname(__file__)
        file = f"{Base}/API"
        return send_file(f"{file}/{filename}.json")
    
api.add_resource(User,'/user/<string:username>')
api.add_resource(UserList,'/users')
api.add_resource(GetFile,'/file/<string:filename>')

if __name__ != '__main__':
    # 如果不是直接运行，则将日志输出到 gunicorn 中
    gunicorn_logger = logging.getLogger('gunicorn.error')
    app.logger.handlers = gunicorn_logger.handlers
    app.logger.setLevel(gunicorn_logger.level)

if __name__ == '__main__':
    app.run()