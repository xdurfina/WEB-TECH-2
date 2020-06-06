pkg load control
format free
arg_list = argv();

M = .5;
m = 0.2;
b = 0.1;
I = 0.006;
g = 9.8;
l = 0.3;
p = I*(M+m)+M*m*l^2;
A = [0 1 0 0; 0 -(I+m*l^2)*b/p (m^2*g*l^2)/p 0; 0 0 0 1; 0 -(m*l*b)/p m*g*l*(M+m)/p 0];
B = [ 0; (I+m*l^2)/p; 0; m*l/p];
C = [1 0 0 0; 0 0 1 0];
D = [0; 0];
K = lqr(A,B,C'*C,1);
Ac = [(A-B*K)];
N = -inv(C(1,:)*inv(A-B*K)*B);

sys = ss(Ac,B*N,C,D);

t = 0:0.05:10;
r =str2double(arg_list{1});

initPozicia=str2double(arg_list{2});
initUhol=0;
[y,t,x]=lsim(sys,r*ones(size(t)),t,[initPozicia;0;initUhol;0]);

poziciaKyvadla = x(:,1);
uholKyvadla = x(:,3);

printf("t=%.10f \n",t);
printf("k=%.10f \n",poziciaKyvadla);
printf("u=%.10f \n",uholKyvadla);


